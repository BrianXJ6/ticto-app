let searched = false;

/**
 * Trigger for input zip
 * @return void
 */
function triggerZip(event) {
    if (event.target.value.length < 8) {
        searched = false;
        return;
    }

    searchZip(event.target.value);
}

/**
 * Get ZIP by API
 * @return void
 */
async function searchZip(zipCode) {
    if (searched) return;

    await fetch(`https://api.postmon.com.br/v1/cep/${zipCode}`)
        .then(async (response) => {
            const { bairro, cidade, estado, logradouro } =
                await response.json();

            document.getElementById("street").value = logradouro;
            document.getElementById("district").value = bairro;
            document.getElementById("city").value = cidade;
            document.getElementById("uf").value = estado;
            searched = true;
        })
        .catch((error) => {
            alert("CEP não localizado.");
            console.error(error);
        });
}

window.triggerZip = triggerZip;
