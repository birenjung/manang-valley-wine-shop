Array.from(document.getElementsByClassName("remove-cover-photo-btn")).forEach(
    (btn) => {
        btn.addEventListener("click", function (event) {
            removeCoverPhoto.call(event.target, event);
        });
    }
);

function removeCoverPhoto(event) {
    event.preventDefault(); // Prevent any default behavior

    const container = this.closest("[data-photo-key]");
    if (!container) {
        console.error("Container not found for removeCoverPhoto.");
        return;
    }

    const key = container.dataset.photoKey;
    const productId = container.dataset.productId; // Changed from appId to productId

    if (!key || !productId) {
        console.error("Missing key or productId in removeCoverPhoto.");
        return;
    }

    fetch("/admin/remove-product-cover-photo", { // Changed endpoint
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ key, product_id: productId }), // Changed key from app_id to product_id
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.status === 200) {
                container.remove(); // Remove from UI after successful delete
            } else {
                console.log(data.msg || "Failed to remove photo.");
            }
        })
        .catch((error) =>
            console.error("Error during cover photo removal:", error)
        );
}



// drag and drop
document.addEventListener("DOMContentLoaded", () => {
    const dropArea = document.getElementById("product_photo_drop_area");
    const fileInput = document.getElementById("product_photo_input");

    // Prevent default behavior for drag & drop events
    ["dragenter", "dragover", "dragleave", "drop"].forEach(eventName => {
        dropArea.addEventListener(eventName, e => {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    // Add highlight on dragenter/dragover
    ["dragenter", "dragover"].forEach(eventName => {
        dropArea.addEventListener(eventName, () => {
            dropArea.classList.add("border-blue-500");
        });
    });

    // Remove highlight on dragleave/drop
    ["dragleave", "drop"].forEach(eventName => {
        dropArea.addEventListener(eventName, () => {
            dropArea.classList.remove("border-blue-500");
        });
    });

    // Handle dropped files
    dropArea.addEventListener("drop", e => {
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            // Optionally, trigger any preview or form logic here
        }
    });

    // Allow click on the drop area to open file dialog
    dropArea.addEventListener("click", () => {
        fileInput.click();
    });
});

// drag and drop ends


// tool tip for product description starts

document.addEventListener("DOMContentLoaded", function () {
    // Get all elements that have tooltip targets
    document.querySelectorAll('[data-tooltip-target]').forEach((el) => {
        const tooltipId = el.getAttribute("data-tooltip-target");
        const tooltip = document.getElementById(tooltipId);
        const tooltipContent = tooltip.querySelector('.desc-tooltip-content');

        if (!tooltip || !tooltipContent) return;

        el.addEventListener("mouseenter", (e) => {
            const content = el.getAttribute("data-tooltip-content");
            if (!content) return;

            // Set the tooltip content
            tooltipContent.textContent = content;           

            // Adjust tooltip width based on content length
            if (content.length > 100) {
                tooltip.classList.remove('max-w-xs');
                tooltip.classList.add('max-w-lg');
            } else if (content.length > 50) {
                tooltip.classList.remove('max-w-xs');
                tooltip.classList.add('max-w-md');
            }

            // Position the tooltip
            const rect = el.getBoundingClientRect();
            tooltip.style.top = `${rect.top + window.scrollY - tooltip.offsetHeight - 8}px`;
            tooltip.style.left = `${rect.left + window.scrollX}px`;

            // Show the tooltip
            tooltip.classList.remove("invisible");
        });

        el.addEventListener("mouseleave", () => {
            // Hide the tooltip
            tooltip.classList.add("invisible");
        });
    });
});

// tool tip for product description ends
