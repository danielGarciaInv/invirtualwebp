    <div class="container w-11/12 mx-auto my-4 lg:w-full">
        <h1 class="text-lg ">Generador de Códigos QR</h1>
    </div>
    <div class="container w-11/12 mx-auto lg:w-full text-base flex flex-col md:flex-row">
        <div class="w-full flex flex-col md:flex-row">
            <div class="w-full md:w-4/12 pr-4">
                <h2 class="font-semibold mb-4">1. Información</h2>
                <form class="flex flex-col" id="formGenerarQR">
                    <label for="inputContenido">Ingresa el Texto o URL:</label>
                    <input type="text" id="inputContenido" name="inputContenido" placeholder="https://" class="my-2 p-2 border-2 transition-colors border-blue-300 focus:border-blue-500 rounded-lg outline-0">
                    
                    <p class="md:space-x-1 space-y-1 md:space-y-0">
                        <button class="inline-block w-full text-left py-2 text-black font-semibold text-md border-b-2 border-blue-300 hover:border-blue-500 focus:border-blue-500 active:border-blue-500 transition-colors" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColor" aria-expanded="false" aria-controls="collapseColor">
                            Color
                        </button>
                    </p>
                    <div class="collapse my-4" id="collapseColor">
                        <div class="flex flex-col p-6 rounded-lg shadow-lg bg-white">
                            <div class="flex flex-row">
                                <div class="flex flex-row items-center mr-4">
                                    <label for="inputColor" class="mr-2">Color:</label>
                                    <input type="color" id="inputColor" name="inputColor" class="w-16 h-10 my-2 cursor-pointer ">
                                </div>
                                <div class="flex flex-row items-center">
                                    <label for="inputFondo" class="mr-2">Fondo:</label>
                                    <input type="color" id="inputFondo" name="inputFondo" value="#FFFFFF" class="w-16 h-10 my-2 cursor-pointer ">
                                </div>
                            </div>

                            <div class="flex flex-row items-center form-check form-switch">
                                <input type="checkbox" name="checkFondoTrans" id="checkFondoTrans" class="form-check-input mr-2 appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-gray-400 bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm" role="switch">
                                <label for="checkFondoTrans">Fondo Transparente</label>
                            </div>
                        </div>
                    </div>

                    <p class="md:space-x-1 space-y-1 md:space-y-0">
                        <button class="inline-block w-full text-left py-2 text-black font-semibold text-md border-b-2 border-blue-300 hover:border-blue-500 focus:border-blue-500 active:border-blue-500 transition-colors" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLogo" aria-expanded="false" aria-controls="collapseLogo">
                            Logo
                        </button>
                    </p>
                    <div class="collapse my-4" id="collapseLogo">
                        <div class="flex flex-col p-6 rounded-lg shadow-lg bg-white">
                            <label for="inputLogo">Selecciona un Logo (Opcional):</label>
                            <p class="text-xs text-gray-600 mb-2">Recomendado: PNG, 1:1</p>
                            <input type="file" accept="image/*" id="inputLogo" name="inputLogo" class="my-2">
                            <div class="flex flex-row items-center form-check form-switch">
                                <input type="checkbox" name="checkFondoTransLogo" id="checkFondoTransLogo" class="form-check-input mr-2 appearance-none w-9 -ml-10 rounded-full float-left h-5 align-top bg-gray-400 bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm" role="switch">
                                <label for="checkFondoTransLogo">Fondo del Logo Transparente</label>
                            </div>
                        </div>
                    </div>

                    <p class="md:space-x-1 space-y-1 md:space-y-0">
                        <button class="inline-block w-full text-left py-2 text-black font-semibold text-md border-b-2 border-blue-300 hover:border-blue-500 focus:border-blue-500 active:border-blue-500 transition-colors" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDiseno" aria-expanded="false" aria-controls="collapseDiseno">
                            Diseño
                        </button>
                    </p>
                    <div class="collapse my-4" id="collapseDiseno">
                        <div class="flex flex-col p-6 rounded-lg shadow-lg bg-white">
                            <label>Puntos:</label>
                            <div class="contOpcionesDots my-2 flex flex-row flex-wrap">
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkDots" id="dSquare" value="square" checked class="hidden">
                                    <label for="dSquare" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/square.png'); ?>" class="w-12 border-gray-400 border-4">
                                    </label>
                                </div>
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkDots" id="dRounded" value="rounded" class="hidden">
                                    <label for="dRounded" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/rounded.png'); ?>" class="w-12 border-gray-400">
                                    </label>
                                </div>
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkDots" id="dDots" value="dots" class="hidden">
                                    <label for="dDots" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/dots.png'); ?>" class="w-12 border-gray-400">
                                    </label>
                                </div>
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkDots" id="dClassy" value="classy" class="hidden">
                                    <label for="dClassy" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/classy.png'); ?>" class="w-12 border-gray-400">
                                    </label>
                                </div>
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkDots" id="dClassy-rounded" value="classy-rounded" class="hidden">
                                    <label for="dClassy-rounded" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/classy-rounded.png'); ?>" class="w-12 border-gray-400">
                                    </label>
                                </div>
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkDots" id="dExtra-rounded" value="extra-rounded" class="hidden">
                                    <label for="dExtra-rounded" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/extra-rounded.png'); ?>" class="w-12 border-gray-400">
                                    </label>
                                </div>
                            </div>

                            <label>Exterior de Esquinas:</label>
                            <div class="contOpcionesCorn my-2 flex flex-row flex-wrap">
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkCorn" id="cSquare" value="square" checked class="hidden">
                                    <label for="cSquare" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/corner-square.png'); ?>" class="w-12 border-gray-400 border-4">
                                    </label>
                                </div>
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkCorn" id="cRounded" value="extra-rounded" class="hidden">
                                    <label for="cRounded" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/corner-rounded.png'); ?>" class="w-12 border-gray-400">
                                    </label>
                                </div>
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkCorn" id="cDots" value="dot" class="hidden">
                                    <label for="cDots" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/corner-dot.png'); ?>" class="w-12 border-gray-400">
                                    </label>
                                </div>
                            </div>

                            <label>Interior de Esquinas:</label>
                            <div class="contOpcionesIntcorn my-2 flex flex-row flex-wrap">
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkInterior" id="iSquare" value="square" checked class="hidden">
                                    <label for="iSquare" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/dot-square.png'); ?>" class="w-12 border-gray-400 border-4">
                                    </label>
                                </div>
                                <div class="opcion w-1/6">
                                    <input type="radio" name="checkInterior" id="iDot" value="dot" class="hidden">
                                    <label for="iDot" class="cursor-pointer">
                                        <img src="<?= base_url('assets/media/dot.png'); ?>" class="w-12 border-gray-400">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="bg-blue-500 hover:bg-blue-400 transition-colors text-neutral-100 font-semibold p-3 rounded-lg mt-4" >Generar QR</button>
                </form>
            </div>

            <div class="w-full my-2 md:m-0 md:w-8/12" id="pasoDos">
                <h2 class="font-semibold mb-4">2. Descarga tu nuevo Código</h2>
                <div class="bg-neutral-200 flex flex-col items-center p-4 rounded-lg w-full md:w-1/2" id="qrArea">
                    <div id="canvas"></div>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const inputContenido = document.getElementById('inputContenido');
        const inputColor = document.getElementById('inputColor');
        const inputFondo = document.getElementById('inputFondo');
        const checkFondoTrans = document.getElementById('checkFondoTrans');
        const checkFondoTransLogo = document.getElementById('checkFondoTransLogo');
        const inputLogo = document.getElementById('inputLogo');
        const formGenerarQR = document.getElementById('formGenerarQR');
        const canvas = document.getElementById("canvas");
        const checksDots = document.getElementsByName('checkDots');
        const checksCorn = document.getElementsByName('checkCorn');
        const checksInterior = document.getElementsByName('checkInterior');
        const pasoDos = document.getElementById("pasoDos");
        var qrcode;
        
        for (let checkDots of checksDots) {
            checkDots.addEventListener('click',()=>{
                colorearChecks(checksDots);
            });
        }
        for (let checkCorn of checksCorn) {
            checkCorn.addEventListener('click',()=>{
                colorearChecks(checksCorn);
            });
        }
        for (let checkInterior of checksInterior) {
            checkInterior.addEventListener('click',()=>{
                colorearChecks(checksInterior);
            });
        }

        const colorearChecks = (checks) => {
            for (let check of checks) {
                if(check.checked){
                    let lab = document.querySelector(`label[for=${check.id}]`).children[0];
                    lab.classList.add('border-4');
                }else{
                    let lab = document.querySelector(`label[for=${check.id}]`).children[0];
                    lab.classList.remove('border-4');
                }
            }
        }

        const checkDiseno = (checks) => {
            for (let check of checks) {
                if(check.checked){
                    return check.value;
                }
            }
        }

        formGenerarQR.addEventListener('submit',(e)=>{
            e.preventDefault();
            canvas.innerHTML = '';
            if(document.getElementById('btnDescargar') != null){
                pasoDos.removeChild(pasoDos.children[pasoDos.children.length - 1]);
            }
            let fondo;
            let src = '';
            let puntos = checkDiseno(checksDots);
            let esquinas = checkDiseno(checksCorn);
            let interior = checkDiseno(checksInterior);
            fondo = (checkFondoTrans.checked) ? '#ffffff00' : inputFondo.value;

            if(inputContenido.value == ''){
                alert('Por favor introduce una URL o un Texto');
                btnDescargar.removeEventListener('click',()=>{
                    qrCode.download({ name: "QR-InvirtualWeb", extension: "png" });
                },true);
                btnDescargar.hidden = true;
            }else{
                if(inputLogo.files.length > 0){
                    let tipo = inputLogo.files[0].type;
                    tipo = tipo.substring(tipo.lastIndexOf('/') + 1);

                    if(tipo == 'png' || tipo == 'jpeg' || tipo == 'svg+xml' || tipo == 'webp'){
                        src = URL.createObjectURL(inputLogo.files[0]);
                    }else{
                        alert('Por favor selecciona solo imagenes!');
                        if(document.getElementById('btnDescargar') != null){
                            pasoDos.removeChild(pasoDos.children[pasoDos.children.length - 1]);
                        }
                        return;
                    }
                }
                let qrCode = new QRCodeStyling({
                    width: 300,
                    height: 300,
                    type: "svg",
                    data: inputContenido.value,
                    image: src,
                    dotsOptions: {
                        color: inputColor.value,
                        type: puntos
                    },
                    cornersSquareOptions: {
                        type: esquinas
                    },
                    cornersDotOptions: {
                        type: interior
                    },
                    backgroundOptions: {
                        color: fondo,
                    },
                    imageOptions: {
                        crossOrigin: "anonymous",
                        imageSize: 0.4,
                        margin: 20,
                        hideBackgroundDots: !checkFondoTransLogo.checked
                    }
                });
    
                qrCode.append(canvas);
                if(!canvas.innerHTML == ''){
                    btnDescargar = document.createElement('button');
                    btnDescargar.setAttribute('class', 'bg-blue-500 hover:bg-blue-400 transition-colors text-neutral-100 font-semibold p-3 rounded-lg');
                    btnDescargar.setAttribute('id','btnDescargar');
                    btnDescargar.innerHTML = 'Descargar';
                    btnDescargar.addEventListener('click',()=>{
                        qrCode.download({ name: "QR-InvirtualWeb", extension: "png" });
                    });
                    pasoDos.appendChild(btnDescargar);
                }else{
                    if(document.getElementById('btnDescargar') != null){
                        pasoDos.removeChild(pasoDos.children[pasoDos.children.length - 1]);
                    }
                }
            }

        });
    });
</script>
