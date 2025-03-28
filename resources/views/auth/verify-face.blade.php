<x-layout>
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h2 class="text-2xl font-semibold text-center mb-4">Face Verification</h2>

        <form action="{{ route('auth.verify-face') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Step 1: ID Photo -->
            <div id="id_step">
                <label class="block font-medium">Upload ID Photo:</label>
                <input type="file" name="id_photo" id="id_photo_input" accept="image/*" class="w-full border rounded p-2">
                
                <div class="text-center mt-2">
                    <button type="button" onclick="startCamera('id')" id="open_id_camera" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Open Camera</button>
                    <video id="id_video" class="mt-2 w-full rounded hidden" autoplay></video>
                    <canvas id="id_canvas" class="hidden"></canvas>
                    <button type="button" onclick="capturePhoto('id')" id="capture_id_photo" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 hidden">Capture Photo</button>
                    <input type="hidden" name="id_photo_capture" id="id_photo_capture">
                    <img id="id_photo_preview" class="mt-2 w-24 mx-auto hidden rounded border">
                </div>
            </div>

            <!-- Step 2: Selfie Photo (Hidden Initially) -->
            <!-- Selfie Capture Section (Initially Hidden) -->
<div id="selfie_step" class="hidden">
    <label class="block font-medium">Upload Selfie:</label>
    <input type="file" name="selfie" id="selfie_input" accept="image/*" class="w-full border rounded p-2">
    
    <div class="text-center">
        <button type="button" onclick="startCamera('selfie')" id="open_selfie_camera" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Open Camera</button>
        <video id="selfie_video" class="mt-2 w-full rounded hidden" autoplay></video>
        <canvas id="selfie_canvas" class="hidden"></canvas>
        <button type="button" onclick="capturePhoto('selfie')" id="capture_selfie_photo" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 hidden">Capture Photo</button>
        <input type="hidden" name="selfie_capture" id="selfie_photo_capture"> <!-- Ensure this ID matches in JS -->
        <img id="selfie_photo_preview" class="mt-2 w-24 mx-auto hidden rounded border">
    </div>
</div>

            <!-- Step 3: Verify Button (Hidden Initially) -->
            <div id="verify_step" class="hidden">
                <button type="submit" id="verify_btn" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">Verify</button>
            </div>
        </form>
    </div>

    <script>
        let activeCamera = null;

        function startCamera(type) {
            const video = document.getElementById(type + '_video');
            const captureBtn = document.getElementById('capture_' + type + '_photo');
            const openCameraBtn = document.getElementById('open_' + type + '_camera');

            navigator.mediaDevices.getUserMedia({ video: true })
                .then(stream => {
                    video.srcObject = stream;
                    video.classList.remove('hidden');
                    video.play();

                    captureBtn.classList.remove('hidden');
                    openCameraBtn.disabled = true;

                    activeCamera = { type, stream };
                })
                .catch(error => console.error("Error accessing camera:", error));
        }

                function capturePhoto(type) {
            const video = document.getElementById(type + '_video');
            const canvas = document.getElementById(type + '_canvas');
            const input = document.getElementById(type + '_photo_capture');
            const preview = document.getElementById(type + '_photo_preview');
            const captureBtn = document.getElementById('capture_' + type + '_photo');
            const openCameraBtn = document.getElementById('open_' + type + '_camera');

            // Check if elements exist before using them
            if (!video || !canvas || !input || !preview) {
                console.error(`❌ Missing elements for ${type}`);
                return;
            }

            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Convert canvas image to Base64
            const imageData = canvas.toDataURL('image/png');
            input.value = imageData;  // Set hidden input value

            // Show preview
            preview.src = imageData;
            preview.classList.remove('hidden');

            // Stop camera stream
            if (activeCamera) {
                activeCamera.stream.getTracks().forEach(track => track.stop());
                video.classList.add('hidden');
                captureBtn.classList.add('hidden');
                openCameraBtn.disabled = false;
            }

            // Move to next step
            if (type === 'id') {
                console.log("✅ ID Photo Captured");
                document.getElementById('id_step').classList.add('hidden'); // Hide ID Step
                document.getElementById('selfie_step').classList.remove('hidden'); // Show Selfie Step
            } else if (type === 'selfie') {
                console.log("✅ Selfie Captured");
                document.getElementById('selfie_step').classList.add('hidden'); // Hide Selfie Step
                document.getElementById('verify_step').classList.remove('hidden'); // Show Verify Button
                console.log("✅ Verify Button is now visible!");
            }
        }


        // Debugging: Check if Verify Button Works
        document.getElementById('verify_btn').addEventListener('click', function() {
            console.log("✅ Verify button clicked!");
            fetch('/debug-log', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: 'Verify button clicked!' })
            });
        });
    </script>
</x-layout>
