
    <script type="text/javascript">
      $(document).ready(function () {
          $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
              $(this).toggleClass('active');
          });

          var deleteModal = document.getElementById('delete-modal')
          deleteModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = deleteModal.querySelector('.modal-title')
            var modalBodyInput = deleteModal.querySelector('.modal-body input')

            modalTitle.textContent = 'New message to ' + recipient
            modalBodyInput.value = recipient
          });
      });
  </script>
  <?php echo $__env->make('layouts.parts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('footer-scripts'); ?>
<?php /**PATH D:\LaravelApps\PizzaNow\resources\views/layouts/parts/footer.blade.php ENDPATH**/ ?>