<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="product_details.css">
</head>
<body>
    <div class="container">
        <div class="product-details-container">
            <div class="product-image">
                Product Image
            </div>
            <div class="product-info">
                <h1 class="product-name">Premium Wireless Headphones</h1>
                <p class="product-description">
                    Experience crystal-clear sound with our premium wireless headphones.
                    Featuring noise cancellation, 30-hour battery life, and comfortable over-ear design.
                </p>
                <div class="product-price" id="product-price">$199.99</div>

                <div class="duration-selector">
                    <label class="duration-label" for="duration">Select Duration:</label>
                    <select id="duration">
                        <option value="1" data-price="199.99">1 Month - $199.99</option>
                        <option value="3" data-price="549.99">3 Months - $549.99</option>
                        <option value="6" data-price="999.99">6 Months - $999.99</option>
                        <option value="12" data-price="1799.99">12 Months - $1,799.99</option>
                    </select>
                </div>

                <div class="buttons">
                    <button class="btn btn-buy">Buy Now</button>
                    <button class="btn btn-cart">Add to Cart</button>
                </div>
            </div>
        </div>

        <!-- Description and Reviews Section with Tabs -->
        <div class="section">
            <div class="tabs">
                <div class="tab active" data-tab="description-tab">Description</div>
                <div class="tab" data-tab="reviews-tab">Reviews (3)</div>
            </div>

            <!-- Description Tab Content -->
            <div class="tab-content active" id="description-tab">
                <h2 class="section-title">Product Description</h2>
                <div class="description-content">
                    <div class="truncated-content" id="description-truncated">
                        <p>Our Premium Wireless Headphones deliver exceptional sound quality with advanced noise cancellation technology. Designed for audiophiles and casual listeners alike, these headphones provide an immersive listening experience whether you're at home, in the office, or on the go.</p>

                        <h3>Key Features</h3>
                        <ul class="feature-list">
                            <li>Active Noise Cancellation for immersive sound</li>
                            <li>30-hour battery life with quick charge capability</li>
                            <li>Bluetooth 5.2 with seamless device pairing</li>
                        </ul>
                    </div>
                    <div id="description-full" style="display: none;">
                        <p>Our Premium Wireless Headphones deliver exceptional sound quality with advanced noise cancellation technology. Designed for audiophiles and casual listeners alike, these headphones provide an immersive listening experience whether you're at home, in the office, or on the go.</p>

                        <h3>Key Features</h3>
                        <ul class="feature-list">
                            <li>Active Noise Cancellation for immersive sound</li>
                            <li>30-hour battery life with quick charge capability</li>
                            <li>Bluetooth 5.2 with seamless device pairing</li>
                            <li>Over-ear design with memory foam ear cushions</li>
                            <li>Built-in microphone for crystal-clear calls</li>
                            <li>Foldable design for easy portability</li>
                            <li>Voice assistant compatible</li>
                        </ul>

                        <h3>Technical Specifications</h3>
                        <ul>
                            <li><strong>Driver Size:</strong> 40mm</li>
                            <li><strong>Frequency Response:</strong> 20Hz - 20kHz</li>
                            <li><strong>Impedance:</strong> 32 Ohms</li>
                            <li><strong>Weight:</strong> 250g</li>
                            <li><strong>Charging Time:</strong> 2 hours</li>
                            <li><strong>Quick Charge:</strong> 10 minutes for 3 hours playback</li>
                        </ul>

                        <h3>Why Choose Our Headphones?</h3>
                        <p>Our headphones are engineered with precision to deliver the best audio experience. The advanced noise cancellation technology blocks out ambient sounds, allowing you to focus on your music or calls. The comfortable over-ear design ensures you can wear them for hours without discomfort.</p>
                    </div>
                    <a class="see-more" onclick="toggleDescription()" id="description-toggle">See More...</a>
                </div>
            </div>

            <!-- Reviews Tab Content -->
            <div class="tab-content" id="reviews-tab">
                <h2 class="section-title">Customer Reviews</h2>
                <div class="reviews-content">
                    <div class="overall-rating">
                        <div class="rating-value">4.7</div>
                        <div class="rating-stars">
                            ★★★★☆
                        </div>
                        <div class="rating-count">(3 reviews)</div>
                    </div>

                    <div class="truncated-content" id="reviews-truncated">
                        <div class="review">
                            <div class="review-header">
                                <div class="review-avatar">AJ</div>
                                <div class="review-author-info">
                                    <div class="review-author">Alex Johnson</div>
                                    <div class="review-date">October 15, 2023</div>
                                </div>
                            </div>
                            <div class="review-stars">★★★★★</div>
                            <div class="review-text">
                                These headphones exceeded my expectations! The noise cancellation is incredible and the battery life is exactly as advertised. Comfortable to wear for hours without any discomfort.
                                <a class="see-more" onclick="toggleReviews()" id="reviews-toggle" style="margin-left: 5px;">See More...</a>
                            </div>
                        </div>
                    </div>

                    <div id="reviews-full" style="display: none;">
                        <div class="review">
                            <div class="review-header">
                                <div class="review-avatar">AJ</div>
                                <div class="review-author-info">
                                    <div class="review-author">Alex Johnson</div>
                                    <div class="review-date">October 15, 2023</div>
                                </div>
                            </div>
                            <div class="review-stars">★★★★★</div>
                            <div class="review-text">
                                These headphones exceeded my expectations! The noise cancellation is incredible and the battery life is exactly as advertised. Comfortable to wear for hours without any discomfort.
                            </div>
                        </div>

                        <div class="review">
                            <div class="review-header">
                                <div class="review-avatar">SW</div>
                                <div class="review-author-info">
                                    <div class="review-author">Sarah Williams</div>
                                    <div class="review-date">September 28, 2023</div>
                                </div>
                            </div>
                            <div class="review-stars">★★★★☆</div>
                            <div class="review-text">
                                Great sound quality and very comfortable. The only reason I'm giving 4 stars instead of 5 is that the touch controls can be a bit sensitive. Otherwise, highly recommend!
                            </div>
                        </div>

                        <div class="review">
                            <div class="review-header">
                                <div class="review-avatar">MC</div>
                                <div class="review-author-info">
                                    <div class="review-author">Michael Chen</div>
                                    <div class="review-date">September 10, 2023</div>
                                </div>
                            </div>
                            <div class="review-stars">★★★★★</div>
                            <div class="review-text">
                                Perfect for my daily commute. The noise cancellation makes a huge difference on the subway. Battery life is fantastic - I only charge them once a week with daily use.
                            </div>
                        </div>
                        <a class="see-more" onclick="toggleReviews()" id="reviews-toggle" style="display: inline-block; margin-top: 10px;">See Less</a>
                    </div>

                    <!-- Review Form -->
                    <div class="review-form">
                        <h3 class="form-title">Write Your Review</h3>
                        <div class="form-group">
                            <label for="review-name">Your Name</label>
                            <input type="text" id="review-name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label>Your Rating</label>
                            <div class="star-rating">
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1">★</label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2">★</label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3">★</label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4">★</label>
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5">★</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review-text">Your Review</label>
                            <textarea id="review-text" placeholder="Share your experience with this product..."></textarea>
                        </div>
                        <button class="submit-btn">Submit Review</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        <div class="related-products">
            <h2 class="section-title">Related Products</h2>
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-card-image">
                        Wireless Earbuds
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">Premium Wireless Earbuds</h3>
                        <p class="product-card-description">Compact and powerful earbuds with noise cancellation</p>
                        <div class="product-card-price">$129.99</div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-card-image">
                        Bluetooth Speaker
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">Portable Bluetooth Speaker</h3>
                        <p class="product-card-description">360° sound with deep bass and 20hr battery</p>
                        <div class="product-card-price">$89.99</div>
                    </div>
                </div>

                <!-- Hidden by default on mobile, shown on desktop -->
                <div class="product-card desktop-only" style="display: none;">
                    <div class="product-card-image">
                        Gaming Headset
                    </div>
                    <div class="product-card-info">
                        <h3 class="product-card-title">Gaming Headset Pro</h3>
                        <p class="product-card-description">7.1 surround sound with mic for gaming</p>
                        <div class="product-card-price">$149.99</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="product_details.js"></script>
</body>
</html>
