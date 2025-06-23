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


// search filter starts
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, skip header (start from 1)
    for (i = 1; i < tr.length; i++) {
        var name = tr[i].getElementsByTagName("td")[1]; // Name column
        var sku = tr[i].getElementsByTagName("td")[2];  // SKU column
        var desc = tr[i].getElementsByTagName("td")[5]; // Description column

        var showRow = false;

        // Search in Name column
        if (name) {
            txtValue = name.textContent || name.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
            }
        }

        // Search in SKU column if not found in name
        if (sku && !showRow) {
            txtValue = sku.textContent || sku.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
            }
        }

        // Search in Description column if not found in previous columns
        if (desc && !showRow) {
            txtValue = desc.textContent || desc.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
            }
        }

        // Show or hide row
        tr[i].style.display = showRow ? "" : "none";
    }
}


function myFunction2() {
    var input, filter, table, tr, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        var fullName = tr[i].getElementsByTagName("td")[2];
        var orderStatusCell = tr[i].getElementsByTagName("td")[6];
        var paymentStatusCell = tr[i].getElementsByTagName("td")[7];
        var email = tr[i].getElementsByTagName("td")[3];

        var showRow = false;

        // Filter by Full Name
        if (fullName) {
            txtValue = fullName.textContent || fullName.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
            }
        }

        // filter by email

        if (email) {
            txtValue = email.textContent || email.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
            }
        }

        // Filter by Order Status
        if (orderStatusCell && !showRow) {
            var selectElement = orderStatusCell.querySelector('select');
            if (selectElement) {
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                if (selectedOption) {
                    txtValue = selectedOption.textContent || selectedOption.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        showRow = true;
                    }
                }
            }

            if (!showRow) {
                var spanElement = orderStatusCell.querySelector('span');
                if (spanElement) {
                    txtValue = spanElement.textContent || spanElement.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        showRow = true;
                    }
                }
            }
        }

        // Filter by Payment Status

        if (paymentStatusCell && !showRow) {
            var statusSpan = paymentStatusCell.querySelector('span');
            if (statusSpan) {
                txtValue = statusSpan.textContent.trim().toUpperCase();
                if (txtValue.indexOf(filter) > -1) {
                    showRow = true;
                }
            }
        }


        // Show or hide the row
        tr[i].style.display = showRow ? "" : "none";
    }
}

// search filter ends








