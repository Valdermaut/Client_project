<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MediaCapture and Streams API</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<device type="media" onchange="update(this.data)"></device>
<video autoplay></video>
<script>
  function update(stream) {
    document.querySelector('video').src = stream.url;
  }
  function hasGetUserMedia() {
  return !!(navigator.mediaDevices &&
    navigator.mediaDevices.getUserMedia);
}

if (hasGetUserMedia()) {
  // Good to go!
} else {
  alert('Webcam is not supported by your browser');
}
const video = document.querySelector('video');

const hdConstraints = {
  video: {width: {min: 1280}, height: {min: 720}}
};

navigator.mediaDevices.getUserMedia(hdConstraints).
  then((stream) => {video.srcObject = stream});
const vgaConstraints = {
  video: {width: {exact: 640}, height: {exact: 480}}
};

navigator.mediaDevices.getUserMedia(vgaConstraints).
  then((stream) => {video.srcObject = stream});
</script>
</body>
</html>