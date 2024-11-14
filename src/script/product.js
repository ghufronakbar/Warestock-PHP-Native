function toggleAddProductModal() {
    const modal = document.getElementById('addProductModal');
    modal.classList.toggle('hidden');
}

function toggleEditProductModal() {
    const editModal = document.getElementById('editProductModal');
    editModal.classList.toggle('hidden');
}

function openEditProductModal(productId, name, description, productTypeId, producedBy, expiredAt) {
    document.getElementById('editProductId').value = productId;
    document.getElementById('editProductName').value = name;
    document.getElementById('editProductDescription').value = description;
    document.getElementById('editProductProducedBy').value = producedBy;
    document.getElementById('editProductExpiredAt').value = expiredAt;

    document.querySelectorAll('.editProductTypeId').forEach((radio) => {
        radio.checked = radio.value === productTypeId;
    });

    toggleEditProductModal();
}
