var verify_token = false;

async function initializeToken() {
    if (localStorage.hasOwnProperty("firebase_token")) {
        firebase.auth().onAuthStateChanged(function (user) {
            user.getIdToken().then(function (idToken) {
                localStorage.setItem("firebase_token", idToken);
                verify_token = true;
            });
        });
    } else {
        firebase.auth().signInWithEmailAndPassword(saiko_email, saiko_password)
            .then((userCredential) => {
                token = userCredential.user.toJSON().stsTokenManager.accessToken;
                localStorage.setItem("firebase_token", token);
                verify_token = true;
            });
    }
}

async function verifyToken() {
    await initializeToken();
    do {
        console.log(verify_token);
        await sleep(200);
    } while (verify_token == false);
    verify_token = false;
}

async function sleep(milliseconds) {
    return new Promise(resolve => setTimeout(resolve, milliseconds));
}

function isLogin() {
    return localStorage.hasOwnProperty('is_login') && localStorage.getItem('is_login') == 'true';
}

async function loginLocal(token, user_id) {
    localStorage.setItem("firebase_token", token);
    localStorage.setItem("is_login", true);
    localStorage.setItem("user_id", user_id);
}

async function logoutLocal() {
    firebase.auth().signOut().then(() => {}).catch((error) => {});
    localStorage.setItem("is_login", false);
    localStorage.removeItem("firebase_token");
    localStorage.removeItem("user_id");
}