@extends('layout')

@section('content')

<div class="container">
    <div class="camera-wrapper">
        <div id="reader"></div>
    </div>

    <div class="result-wrapper">
        <div id="qrcode"></div>
        <div id="generatedData"></div>
    </div>
</div>

<script src="/node_modules/html5-qrcode/html5-qrcode.min.js"></script>
<script src="/public/jquery.min.js"></script>
<script src="/public/qrcode.min.js"></script>

<script>
    const config = {
        fps: 30,
        qrbox: 200
    }
    const scanner = new Html5QrcodeScanner("reader", config)

    scanner.render((data) => {
        document.getElementById("generatedData").innerHTML = "<p>Scanned data: " + data + "</p>";
    });

    var qrcode = new QRCode("qrcode", {
        width: 400,
        height: 400,
        ColorDark: "#00077"
    });

    function generate() {
        qrcode.makeCode(document.getElementById('data').value);
    }
</script>

<style>

#content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center; 
    background-image: url('https://i.pinimg.com/originals/ea/11/7a/ea117a587eb893c6357a1c7b13f45b31.png');
    background-size: cover;
    background-position: center;
    }
    
.container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 50px;
}

.camera-wrapper {
    width: 55%;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); 
}

.result-wrapper {
    width: 20%;
    margin: 0 auto;
}


#generatedData {
    border: 1px solid #e29898;
    background-color: aliceblue;
    padding: 10px;
    position: absolute;
    bottom: 50%;
    width: 10%;
    height: 5%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
    transform: rotateY(-10deg) rotateX(10deg);
    transition: transform 0.5s ease; 
}


</style>

@endsection
