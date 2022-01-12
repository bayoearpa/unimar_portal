<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR Scan</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
    	html, body{
    		padding:0px;
    		margin:0px;
    		background: #f7f7f7;
    	}
        /*hr {
            margin-top: 32px;
        }
        input[type="file"] {
            display: block;
            margin-bottom: 16px;
        }*/
        
        #flash-toggle {
            display: visible;
        }

        #qr-video{
        	width:100%; 
        	/*border:1px solid #000;
        	height: 100%;*/
        }
        #qr-scanned{
        	width:100%; 
        	overflow: hidden;
        }
        #cam-qr-result{
        	overflow-wrap: break-word;
  			word-wrap: break-word;
  			hyphens: auto;
        }
    </style>
</head>
<body>
	<div class="container">
	   	<div class="row">
	   		<div class="col-md-12 col-xs-12">
	   			<video id="qr-video"></video>
	   			<div style="margin-bottom:10px;" id="qr-scanned"></div>
	   		</div>
	   		<div class="col-md-6 col-xs-6">
	   			<div class="alert alert-success">
		   			<b>Camera: </b>
		        	<span id="cam-has-camera"></span>
	        	</div>
	   		</div>
	   		<div class="col-md-6 col-xs-6">
	   			<div class="alert alert-info">
		   			<b>Flash: </b>
		        	<span id="cam-has-flash"></span>
		        </div>
	   		</div>
	   		<div class="col-md-12 col-xs-12">
	   			<b>QR code: </b>
			    <span id="cam-qr-result">None</span>
			    <br>
			    <b>Time Stamp: </b>
			    <span id="cam-qr-result-timestamp"></span>
	   		</div>
	   		<!-- <div class="col-md-12 col-xs-12">
	   			<hr>
	   			<h4>Data : </h4>
	   			<div id="data"></div>
	   			<hr>
	   		</div>
	   		<div class="col-md-12 col-xs-12">
	   			<a class="btn btn-danger btn-lg btn-block" id="reset-button" href="javascipt:;"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</a>
	   		</div> -->
	   	</div>
	</div>
    <!-- <div>
        <button id="flash-toggle">📸 Flash: <span id="flash-state">off</span></button>
    </div> -->

    <!-- <h1>Scan from File:</h1>
    <input type="file" id="file-selector">
    <b>Detected QR code: </b>
    <span id="file-qr-result">None</span> -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
import('<?php echo base_url() ?>assets/qrscanner/qr-scanner.min.js').then((module) => {
    const QrScanner = module.default;
    QrScanner.WORKER_PATH = '<?php echo base_url() ?>assets/qrscanner/qr-scanner-worker.min.js';

    // import QrScanner from "../../assets/qrscanner/qr-scanner.min.js";

    const video = document.getElementById('qr-video');
    const camHasCamera = document.getElementById('cam-has-camera');
    const camHasFlash = document.getElementById('cam-has-flash');
    const flashToggle = document.getElementById('flash-toggle');
    const flashState = document.getElementById('flash-state');
    const camQrResult = document.getElementById('cam-qr-result');
    const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
    const fileSelector = document.getElementById('file-selector');
    const fileQrResult = document.getElementById('file-qr-result');

    function setResult(label, result) {
    	var lnk = '<?php echo base_url() ?>aset/detail_inventaris/'+result;
    	var res = '<a href="'+lnk+'">'+lnk+'</a>';

    	label.innerHTML = result;
        // label.textContent = result;
        camQrResultTimestamp.textContent = new Date().toString();
        label.style.color = 'teal';
        clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);

        scanner.stop();
        $('#qr-video').hide();
        scanner.$canvas.style.display = 'block';

        setTimeout(function(){
        	location.href = lnk;
        }, 1000);
    }

    // ####### Web Cam Scanning #######

    QrScanner.hasCamera().then(hasCamera => camHasCamera.innerHTML = picon(hasCamera));

    const scanner = new QrScanner(video, result => setResult(camQrResult, result), error => {
        camQrResult.textContent = error;
        camQrResult.style.color = 'inherit';
    });

    scanner.start().then(() => {
        scanner.hasFlash().then(hasFlash => {
            // camHasFlash.textContent = hasFlash;
            camHasFlash.innerHTML = picon(hasFlash);
            
            if (hasFlash) {
                flashToggle.style.display = 'inline-block';
                flashToggle.addEventListener('click', () => {
                    scanner.toggleFlash().then(() => flashState.textContent = scanner.isFlashOn() ? 'on' : 'off');
                });
            }
        });
    });

    // for debugging
    window.scanner = scanner;

    // document.getElementById('show-scan-region').addEventListener('change', (e) => {
    //     const input = e.target;
    //     const label = input.parentNode;
    //     label.parentNode.insertBefore(scanner.$canvas, label.nextSibling);
    //     scanner.$canvas.style.display = input.checked ? 'block' : 'none';
    // });

    // document.getElementById('inversion-mode-select').addEventListener('change', event => {
    //     scanner.setInversionMode(event.target.value);
    // });

    // document.getElementById('start-button').addEventListener('click', () => {
    //     scanner.start();
    // });

    // document.getElementById('reset-button').addEventListener('click', () => {
    //     scanner.start();
    //     $('#qr-scanned').hide();
    //     video.show();
    // });

    // document.getElementById('stop-button').addEventListener('click', () => {
    //     scanner.stop();
    // });

    // ####### File Scanning #######

    // fileSelector.addEventListener('change', event => {
    //     const file = fileSelector.files[0];
    //     if (!file) {
    //         return;
    //     }
    //     QrScanner.scanImage(file)
    //         .then(result => setResult(fileQrResult, result))
    //         .catch(e => setResult(fileQrResult, e || 'No QR code found.'));
    // });

    $(document).ready(function(){
    	var width = getWidth();
    	var height= getHeight();

    	scanner.start();

    	$('#qr-scanned').html(scanner.$canvas);
    	scanner.$canvas.style.display = 'none';

    	// $('#qr-video').width(width);
    	// $('#qr-video').height(height);
    });

    function picon(t)
    {
    	if(t == true)
    	{
    		var icn = 'glyphicon-ok';
    	}else{
    		var icn = 'glyphicon-remove';
    	}

    	var str = '<span class="glyphicon '+icn+'" aria-hidden="true"></span>';
    	return str;
    }

    function getWidth() {
	  return Math.max(
	    document.body.scrollWidth,
	    document.documentElement.scrollWidth,
	    document.body.offsetWidth,
	    document.documentElement.offsetWidth,
	    document.documentElement.clientWidth
	  );
	}

	function getHeight() {
	  return Math.max(
	    document.body.scrollHeight,
	    document.documentElement.scrollHeight,
	    document.body.offsetHeight,
	    document.documentElement.offsetHeight,
	    document.documentElement.clientHeight
	  );
	}
});
</script>
</body>
</html>
