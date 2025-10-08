# json szerver leírása

# json szerver indítása
[json szerver](https://github.com/typicode/json-server)  

json telepítés (globálisan): `npm install -g json-server`

Az alkalmazás gyökér könyvtárában létre kell hozni egy `db.json` nevű fájlt
<!--  -->

```json
{
  "posts": [
    {
      "id": "1",
      "title": "a title",
      "views": 100
    },
    {
      "id": "2",
      "title": "another title",
      "views": 200
    }
  ],
  "comments": [
    {
      "id": "1",
      "text": "a comment about post 1",
      "postId": "1"
    },
    {
      "id": "2",
      "text": "another comment about post 1",
      "postId": "1"
    }
  ],
  "profile": {
    "name": "typicode"
  }
}
```

json szerver idítás: `json-server --watch ./db.json`

# Adat mentés
```json
{
  "currencies": [
    {
      "rates": {
        "HUF": 1,
        "RUB": 0.25,
        "USD": 0.0033,
        "EUR": 0.0028
      },
      "name": "Magyar Forint",
      "symbol": "Ft",
      "id": "HUF"
    },
    {
      "rates": {
        "HUF": 4.02,
        "RUB": 1,
        "USD": 0.013,
        "EUR": 0.011
      },
      "name": "Orosz Rubel",
      "symbol": "₽",
      "id": "RUB"
    },
    {
      "rates": {
        "HUF": 307.07,
        "RUB": 76.44,
        "USD": 1,
        "EUR": 0.85
      },
      "name": "USA Dollár",
      "symbol": "$",
      "id": "USD"
    },
    {
      "rates": {
        "HUF": 361.09,
        "RUB": 89.88,
        "USD": 1.18,
        "EUR": 1
      },
      "name": "Euró",
      "symbol": "€",
      "id": "EUR"
    }
  ]
}

```