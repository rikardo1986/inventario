<script>
      document.addEventListener("DOMContentLoaded", function () {
        const tipoSelect = document.getElementById("tipo");
        const otroTipoInput = document.getElementById("otroTipo");
        const asignadoSelect = document.getElementById("asignado");

        // Lista de campos a ocultar cuando es "Sin Asignar"
        const camposAsignacion = document.querySelectorAll(
          "#funcionario, #usuario, #edificio, #unidadFL, #piso, #fechaAsignacion"
        );

        // Función para mostrar/ocultar el campo "otro tipo"
        tipoSelect.addEventListener("change", function () {
          if (tipoSelect.value === "otro") {
            otroTipoInput.style.display = "block";
            otroTipoInput.setAttribute("required", "true");
          } else {
            otroTipoInput.style.display = "none";
            otroTipoInput.removeAttribute("required");
            otroTipoInput.value = "";
          }
        });

        // Función para ocultar/mostrar campos según la asignación
        asignadoSelect.addEventListener("change", function () {
          if (asignadoSelect.value === "No Asignado") {
            camposAsignacion.forEach((campo) => {
              campo.closest(".form-group").style.display = "none";
              campo.removeAttribute("required");
            });
          } else {
            camposAsignacion.forEach((campo) => {
              campo.closest(".form-group").style.display = "block";
              campo.setAttribute("required", "true");
            });
          }
        });
      });
    </script>