<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['product_id'], $input['name'], $input['rating'], $input['comment'])) {
    $productId = $input['product_id'];
    $name = htmlspecialchars($input['name']);
    $rating = intval($input['rating']);
    $comment = htmlspecialchars($input['comment']);

    if (empty($name) || empty($comment) || $rating < 1 || $rating > 5) {
        echo json_encode(['success' => false, 'message' => 'Invalid data provided.']);
        exit;
    }

    $newReview = [
        'id' => uniqid(),
        'product_id' => $productId,
        'name' => $name,
        'rating' => $rating,
        'comment' => $comment,
        'timestamp' => date('Y-m-d H:i:s'),
        'approved' => false
    ];

    $reviewsFile = 'reviews.json';
    $reviews = [];
    if (file_exists($reviewsFile)) {
        $reviews = json_decode(file_get_contents($reviewsFile), true);
    }

    $reviews[] = $newReview;

    if (file_put_contents($reviewsFile, json_encode($reviews, JSON_PRETTY_PRINT))) {
        echo json_encode(['success' => true, 'message' => 'Review submitted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save review.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}
?>
