<?php
$products = get_products();
?>
<div class="content-card">
    <h2 class="card-title">Discount Management</h2>
    <p>Manage discounts for your products.</p>
    <div class="orders-table-container">
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Discount Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td data-label="Product Name"><?php echo htmlspecialchars($product['name']); ?></td>
                        <td data-label="Discount Status">
                            <?php
                            if (isset($product['discount']) && $product['discount']['status'] === 'active') {
                                echo '<span class="status-badge status-confirmed">Active</span>';
                            } else {
                                echo '<span class="status-badge status-cancelled">Inactive</span>';
                            }
                            ?>
                        </td>
                        <td data-label="Actions">
                            <button class="action-btn" onclick="openEditModal(<?php echo $product['id']; ?>)">Edit</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Modal -->
<div id="edit-modal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <h2 id="modal-title">Edit Discount</h2>
        <form id="edit-discount-form" method="POST" action="admin_dashboard.php">
            <input type="hidden" name="update_discount" value="1">
            <input type="hidden" name="product_id" id="product-id">

            <div class="form-group">
                <label for="discount-type">Discount Type</label>
                <select name="discount_type" id="discount-type" class="form-control">
                    <option value="percentage">Percentage</option>
                    <option value="fixed">Fixed Amount</option>
                </select>
            </div>

            <div class="form-group">
                <label for="discount-value">Discount Value</label>
                <input type="number" step="0.01" name="discount_value" id="discount-value" class="form-control">
            </div>

            <div class="form-group">
                <label for="start-date">Start Date</label>
                <input type="date" name="start_date" id="start-date" class="form-control">
            </div>

            <div class="form-group">
                <label for="end-date">End Date</label>
                <input type="date" name="end_date" id="end-date" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>

<script>
    function openEditModal(productId) {
        // Find the product data
        const product = <?php echo json_encode($products); ?>.find(p => p.id === productId);

        // Populate the form fields
        document.getElementById('product-id').value = product.id;
        document.getElementById('modal-title').innerText = 'Edit Discount for ' + product.name;

        if (product.discount) {
            document.getElementById('discount-type').value = product.discount.type;
            document.getElementById('discount-value').value = product.discount.value;
            document.getElementById('start-date').value = product.discount.startDate;
            document.getElementById('end-date').value = product.discount.endDate;
            document.getElementById('status').value = product.discount.status;
        } else {
            // Reset fields if no discount is set
            document.getElementById('discount-type').value = 'percentage';
            document.getElementById('discount-value').value = '';
            document.getElementById('start-date').value = '';
            document.getElementById('end-date').value = '';
            document.getElementById('status').value = 'inactive';
        }

        // Show the modal
        document.getElementById('edit-modal').style.display = 'block';
    }

    function closeEditModal() {
        // Hide the modal
        document.getElementById('edit-modal').style.display = 'none';
    }
</script>
