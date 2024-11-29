function sendRequest(xhr ,method, url, data = null) {
    return new Promise((resolve, reject) => {
        xhr.responseType = "json";
        xhr.open(method, url);

        xhr.setRequestHeader("Content-Type", "application/json"); // якщо потрібен JSON

        xhr.onload = function () {
            if (xhr.status >= 400) {
                reject(xhr.response);
            } else {
                resolve(xhr.response);
            }
        };

        xhr.onerror = function () {
            reject(xhr.response);
        };

        xhr.send(data ? JSON.stringify(data) : null);
    });
}