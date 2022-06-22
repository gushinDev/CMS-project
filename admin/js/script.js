const editPostCurrentImage = document.querySelector(".editPostCurrentImage");
const formControlFile = document.querySelector(".form-control-file");

// Show image after upload
if (formControlFile != null) {
  formControlFile.addEventListener("change", (e) => {
    const [path] = e.target.value.split('C:\\fakepath\\').filter(item => item !== '');
    editPostCurrentImage.src = `../img/${path}`;
  });
}