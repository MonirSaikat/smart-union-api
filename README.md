### Smart Union API

This is a api project using laravel with passport token based authentication.

### Available Routes

| Route           | Method | Required Fields    | Optional Fields |
| --------------- | ------ | ------------------ | --------------- |
| /api/login      | POST   | email, password    | -               |
| /api/notes      | GET    | -                  | -               |
| /api/notes      | POST   | title, description | category_id     |
| /api/categories | POST   | name               | -               |
