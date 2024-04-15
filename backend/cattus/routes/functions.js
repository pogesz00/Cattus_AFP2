function calculateDistance() {
    // Generate random coordinates for the cat within the 100x100 grid
    const targetX = Math.floor(Math.random() * 101); // Random x-coordinate (0 to 100)
    const targetY = Math.floor(Math.random() * 101); // Random y-coordinate (0 to 100)

    // Calculate the distance traveled using the Pythagorean theorem (distance = sqrt((x2 - x1)^2 + (y2 - y1)^2))
    const distance = Math.sqrt(Math.pow(targetX, 2) + Math.pow(targetY, 2));

    return distance;
}

// Example usage:
const distanceTraveled = calculateDistance();