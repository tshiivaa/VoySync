function getUserIDFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const idString = urlParams.get('id');
    console.log(idString); // Log the extracted value
    return parseInt(idString, 10); // Base 10 (decimal)
}

const id = getUserIDFromURL();
console.log(id); // Log the parsed ID