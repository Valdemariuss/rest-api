# Rest API

# User

## Get users list

### [GET] http://localhost/api/users

### Sample API response:
`
{
    "timestamp": 1556899960,
    "code": 200,
    "payload": [
        {
            "id": 2,
            "username": "test_user",
            "username_canonical": "test_user",
            "email": "test@example.com",
            "email_canonical": "test@example.com",
            "enabled": true,
            "password": "$2y$13$K0pHl9A7xbIVtikBxZVYw.8OptOcbxhwKxGceItA6ncglHuUBygqq",
            "groups": [],
            "roles": []
        }
    ]
}
`

# Movie

## Get movies list

### [GET] http://localhost/api/movies

### Sample API response:
`
{
    "timestamp": 1556900263,
    "code": 200,
    "payload": [
        {
            "id": 2,
            "name": "aaadd",
            "description": "some film about me"
        }
    ]
}
`

## Create movie

### [POST] http://localhost/movie

### Headers:
`Content-Type: application/json`

### Body:
`
{
    "name": "some movie name",
    "description": "some movie description"
}
`

### Sample API response:
`
{
    "timestamp": 1556900472,
    "code": 201,
    "payload": {
        "status": "ok"
    }
}
`