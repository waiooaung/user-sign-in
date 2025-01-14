<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Sign In</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 font-[sans-serif]">
            <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
                <div class="max-w-md w-full">
                    <div class="p-8 rounded-2xl bg-white shadow">
                        <h2 class="text-gray-800 text-center text-2xl font-bold">Sign in</h2>
                        <form class="mt-8 space-y-4" method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">Name</label>
                                @error ('name')
                                    <p class="text-xs text-red-500 flex items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="currentColor" class="mr-2"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.853 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.046-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.046 216.341 216.341S375.275 472.341 256 472.341z"
                                            data-original="#000000" />
                                        <path
                                            d="M373.451 166.965c-8.071-7.337-20.623-6.762-27.999 1.348L224.491 301.509 166.053 242.1c-7.714-7.813-20.246-7.932-28.039-.238-7.813 7.674-7.932 20.226-.238 28.039l73.151 74.361a19.804 19.804 0 0 0 14.138 5.929c.119 0 .258 0 .377.02a19.842 19.842 0 0 0 14.297-6.504l135.059-148.722c7.358-8.131 6.763-20.663-1.347-28.02z"
                                            data-original="#000000" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <div class="relative flex items-center">
                                <input name="name" type="text" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600" placeholder="Enter your name" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                                </svg>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="text-gray-800 text-sm mb-2 block">Capture Profile Photo</label>
                                @error ('photo')
                                    <p class="text-xs text-red-500 flex items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="currentColor" class="mr-2"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.853 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.046-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.046 216.341 216.341S375.275 472.341 256 472.341z"
                                            data-original="#000000" />
                                        <path
                                            d="M373.451 166.965c-8.071-7.337-20.623-6.762-27.999 1.348L224.491 301.509 166.053 242.1c-7.714-7.813-20.246-7.932-28.039-.238-7.813 7.674-7.932 20.226-.238 28.039l73.151 74.361a19.804 19.804 0 0 0 14.138 5.929c.119 0 .258 0 .377.02a19.842 19.842 0 0 0 14.297-6.504l135.059-148.722c7.358-8.131 6.763-20.663-1.347-28.02z"
                                            data-original="#000000" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                <video id="video" width="100%" height="auto" autoplay></video>
                                <canvas id="canvas" style="display:none;"></canvas>
                                <button type="button" id="captureButton" class="mt-2 bg-indigo-600 text-white p-2 rounded hover:bg-indigo-700">Capture Photo</button>
                            </div>

                            <div class="mb-4">
                                <img id="imagePreview" src="" alt="Captured Image" class="hidden w-full h-auto rounded-sm mx-auto">
                                <input type="hidden" name="photo" id="photoInput">
                                <button type="button" id="retakeButton" class="hidden mt-2 bg-indigo-600 text-white p-2 rounded hover:bg-indigo-700">Retake Photo</button>
                            </div>

                            <div class="!mt-8">
                                <button type="submit" class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                                    Sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
            @if(session('message'))
                <script>
                    window.addEventListener('DOMContentLoaded', function () {
                        let message = '{{ session('message') }}';
                        let type = '{{ session('message_type') }}';

                        Toastify({
                            text: message,
                            duration: 3000,  // Duration of the toast (in ms)
                            backgroundColor: type === 'success' ? "green" : "red", // Green for success, Red for error
                            close: true, // Show close button
                            gravity: "top", // Position of the toast (top or bottom)
                            position: "right", // Position of the toast (left, center, right)
                            stopOnFocus: true, // Stop the toast from disappearing when focused
                        }).showToast();
                    });
                </script>
            @endif
            <script>
                let stream;

                const video = document.getElementById('video');
                const captureButton = document.getElementById('captureButton');
                const retakeButton = document.getElementById('retakeButton');
                const imagePreview = document.getElementById('imagePreview');
                const photoInput = document.getElementById('photoInput');
                const canvas = document.getElementById('canvas');
                const ctx = canvas.getContext('2d');

                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(mediaStream => {
                        stream = mediaStream;
                        video.srcObject = stream;
                    })
                    .catch(function (error) {
                        console.error('Error accessing camera:', error);
                    });
            
                // Capture photo
                captureButton.addEventListener('click', function() {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

                    const dataUrl = canvas.toDataURL('image/png');

                    imagePreview.src = dataUrl;
                    video.classList.add('hidden');
                    captureButton.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                    retakeButton.classList.remove('hidden');

                    photoInput.value = dataUrl;
                    stream.getTracks().forEach(track => track.stop());
                });

                retakeButton.addEventListener('click', function() {
                    navigator.mediaDevices.getUserMedia({ video: true })
                        .then(mediaStream => {
                            stream = mediaStream;
                            video.srcObject = stream;
                            video.classList.remove('hidden');
                            captureButton.classList.remove('hidden');
                            imagePreview.classList.add('hidden');
                            retakeButton.classList.add('hidden');
                            photoInput.value = '';
                        });
                });
            </script>
    </body>
</html>