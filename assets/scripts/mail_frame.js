function base64ImageToBlob(x, file_name, mode = 0) {
    // console.log(str);
    var bs_string;
    if (mode === 0) {
        bs_string = $('#attachment_' + x).val();
        // bs_string = document.getElementById('attachment_' + x).value;
    } else {
        // bs_string = document.getElementById('attachment_' + x).value;
        bs_string = $('#attachment_m_' + x).val();
    }
    var type = mime.getType(file_name);
    //        // // var b64 = str.substr(pos + 8);
    //        // // decode base64
    var imageContent = atob(bs_string);
    // create an ArrayBuffer and a view (as unsigned 8-bit)
    var buffer = new ArrayBuffer(imageContent.length);
    var view = new Uint8Array(buffer);
    // fill the view, using the decoded base64
    for (var n = 0; n < imageContent.length; n++) {
        view[n] = imageContent.charCodeAt(n);
    }
    // convert ArrayBuffer to Blob
    var blob = new Blob([buffer], {type: type});
    down(blob, file_name, type);
}