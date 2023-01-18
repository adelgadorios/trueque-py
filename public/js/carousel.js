createImageBitmap(
    document.getElementById('image').removeAttribute('id'),
    { resizeWidth: 300, resizeHeight: 234, resizeQuality: 'high' }
)
    .then(imageBitmap =>
        document.getElementById('canvas').getContext('2d').drawImage(imageBitmap, 0, 0).removeAttribute('id')
    );
