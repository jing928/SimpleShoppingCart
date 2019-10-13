function verifyInput(field_value, length) {
    let value = document.getElementById(field_value).value;
    let button = document.getElementById('submit');
    button.disabled = value.length < length;
}

const pubKey = "-----BEGIN PUBLIC KEY-----MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AM" +
    "IIBCgKCAQEAzdxaei6bt/xIAhYsdFdW62CGTpRX+GXoZkzqvbf5oOxw4wKENjFX7LsqZX" +
    "xdFfoRxEwH90zZHLHgsNFzXe3JqiRabIDcNZmKS2F0A7+Mwrx6K2fZ5b7E2fSLFbC7Fsv" +
    "L22mN0KNAp35tdADpl4lKqNFuF7NT22ZBp/X3ncod8cDvMb9tl0hiQ1hJv0H8My/31w+F+Cda" +
    "t/9Ja5d1ztOOYIx1mZ2FD2m2M33/BgGY/BusUKqSk9W91Eh99+tHS5oTvE8CI8g7pvhQteqmVgBb" +
    "JOa73eQhZfOQJ0aWQ5m2i0NUPcmwvGDzURXTKW+72UKDz671bE7YAch2H+U7UQeawwIDAQAB" +
    "-----END PUBLIC KEY-----";

function rsaEncrypt(message) {
    let encryptor = new JSEncrypt();
    encryptor.setPublicKey(pubKey);
    return encryptor.encrypt(message);
}