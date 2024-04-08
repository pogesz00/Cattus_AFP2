Cats Endpoints
Create a Cat
To create a new cat entry, send a POST request to /cats with the required fields ownerID, name, and picture in the request body. If successful, it returns the ID of the created cat. If any required fields are missing, it returns a 400 Bad Request error. If an error occurs during cat creation, it returns a 500 Internal Server Error.

Get All Cats
To retrieve all cats, send a GET request to /cats. It returns an array of all cats if successful. If an error occurs while retrieving cats, it returns a 500 Internal Server Error.

Get Cat by ID
To retrieve a specific cat by its ID, send a GET request to /cats/:id, where :id is the ID of the cat. It returns the cat object if found. If the requested cat does not exist, it returns a 404 Not Found error. If an error occurs while retrieving the cat, it returns a 500 Internal Server Error.

Update Cat
To update a specific cat by its ID, send a PUT request to /cats/:id, where :id is the ID of the cat. Include the fields ownerID, name, and picture in the request body to update the cat details. If successful, it returns a 200 OK status. If the requested cat does not exist, it returns a 404 Not Found error. If an error occurs during the update, it returns a 500 Internal Server Error.

Delete Cat
To delete a specific cat by its ID, send a DELETE request to /cats/:id, where :id is the ID of the cat. If successful, it returns a 200 OK status. If the requested cat does not exist, it returns a 404 Not Found error. If an error occurs while deleting the cat, it returns a 500 Internal Server Error.

Positions Endpoints








