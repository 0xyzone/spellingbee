<x-base>
    <x-top-content></x-top-content>
    <x-sponsors :sponsors=$sponsors></x-sponsors><!-- Popup Container -->
    <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full mt-32">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Announcement</h2>
            <p class="text-lg font-semibold text-gray-600 mb-2">Postponement of Spelling Bee Event</p>
            <p class="text-gray-700 leading-relaxed">
                Dear Participants, Teachers, and Parents,<br><br>
                We regret to inform you that our highly anticipated Spelling Bee Championship, originally scheduled for
                <strong>Dec. 22nd - 28th, 2024</strong>, will be postponed due to a clash with school examination schedules.
                We understand the importance of academics and want to ensure all students can participate without compromising their studies.<br><br>
                The new date for the Spelling Bee Championship will be announced soon. We are excited to provide an even better experience and hope this change will allow all participants to showcase their spelling talents without any conflicts.<br><br>
                We apologize for any inconvenience caused and appreciate your understanding and support. Further details and updates will be shared soon.<br><br>
                Thank you for your cooperation.<br><br>
                Warm regards,<br>
                <strong>Mahendra Maharjan</strong><br>
                Evention Master<br>
                Spelling Bee Nepal
            </p>
            <button id="closePopup" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>

    <script>
        // Check if the popup was closed before
        const popupClosed = localStorage.getItem("popupClosed");

        // Show popup if it hasn't been closed before
        if (!popupClosed) {
            document.getElementById("popup").classList.remove("hidden");
        }

        // Close the popup and save the state in local storage
        document.getElementById("closePopup").addEventListener("click", () => {
            document.getElementById("popup").classList.add("hidden");
            localStorage.setItem("popupClosed", "true");
        });

    </script>
</x-base>
