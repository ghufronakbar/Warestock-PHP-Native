function toggleModal() {
    const modal = document.getElementById('modal');
    modal.classList.toggle('hidden');
}

function toggleEditModal() {
    const editModal = document.getElementById('editModal');
    editModal.classList.toggle('hidden');
}

function openEditModal(productTypeId, productTypeName) {
    document.getElementById('editProductTypeId').value = productTypeId;
    document.getElementById('editProductTypeName').value = productTypeName;
    toggleEditModal();
}
