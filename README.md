<a href="https://aimeos.org/">
    <img src="img/telebirrlogo.png" alt="Telebirr" title="Aimeos" align="right" height="60" />
</a>

# telebirr

![GitHub branch checks state](https://img.shields.io/github/checks-status/MelakuDemeke/telebirr/main)
![GitHub repo size](https://img.shields.io/github/repo-size/MelakuDemeke/telebirr)
![GitHub issues](https://img.shields.io/github/issues/MelakuDemeke/telebirr)
![GitHub](https://img.shields.io/github/license/MelakuDemeke/telebirr?style=flat)
![GitHub Repo stars](https://img.shields.io/github/stars/MelakuDemeke/telebirr?logo=github&style=flat)
![GitHub forks](https://img.shields.io/github/forks/MelakuDemeke/telebirr?logo=github&style=falt)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/MelakuDemeke/telebirr?logo=github)
![GitHub last commit](https://img.shields.io/github/last-commit/MelakuDemeke/telebirr)

this repo will help you get the request data by inputting all your provided informations
![](doc/img/mainscreen.png)

## Installation
```
git clone https://github.com/MelakuDemeke/telebirr.git
```
## Usage
### Required information's
you will receive the required information from Tele with information which looks like theis :arrow_down:

| merchant name   | short code   |  APP ID | APP KEY  |  Public ID | H5  | InApp Payment   |
|---|---|---|---|---|---|---|
| owner name  | 6-digit code  | 32-character Id  | 32-character key  | 392-character public key  | web payment url  | mobile payment url  |

after getting those informations fill it on the input section according to the label

1. fill out all the informations
2. click on get `get data for postman` it will give you a json data with 3 key value pairs
3. use the json in postman
![](doc/img/postman.png)
- you can also open the payment screen by clicking `goToPayment`
![](doc/img/afterpayment.png)