<script>
      document
        .getElementById("buscarBtn")
        .addEventListener("click", function () {
          const busqueda = document.getElementById("busqueda").value.trim();

          if (busqueda === "") {
            Swal.fire(
              "Error",
              "Ingrese un número de serie o usuario",
              "warning"
            );
            return;
          }

          fetch(`conexion.php?buscar=${busqueda}`)
            .then((response) => response.json())
            .then((data) => {
              if (data.error) {
                Swal.fire("Error", "No se encontró el equipo", "error");
              } else {
                document
                  .getElementById("formModificar")
                  .classList.remove("hidden");
                document.getElementById("idEquipo").value = data.id;
                document.getElementById("marca").value = data.marca;
                document.getElementById("modelo").value = data.modelo;
                document.getElementById("usuario").value = data.usuario;
                document.getElementById("estado").value = data.estado;
              }
            })
            .catch((error) => console.error("Error:", error));
        });

      document
        .getElementById("formModificar")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          const formData = new FormData(this);

          fetch("conexion.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                Swal.fire(
                  "Éxito",
                  "Equipo modificado correctamente",
                  "success"
                );
              } else {
                Swal.fire("Error", "No se pudo modificar el equipo", "error");
              }
            })
            .catch((error) => console.error("Error:", error));
        });
    </script>