  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const triggers = document.querySelectorAll('[data-modal-target]');
      const modals = document.querySelectorAll('.modal');
      if (!triggers.length || !modals.length) {
        return;
      }

      let activeModal = null;
      let lastFocusedElement = null;

      function handleKeydown(event) {
        if (event.key === 'Escape' && activeModal) {
          event.preventDefault();
          closeModal(activeModal);
        }
      }

      function openModal(modal) {
        if (!modal) return;
        lastFocusedElement = document.activeElement;
        modal.classList.add('is-visible');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('modal-open');
        const modalBox = modal.querySelector('.modal__box');
        if (modalBox) {
          modalBox.focus();
        }
        document.addEventListener('keydown', handleKeydown);
        activeModal = modal;
      }

      function closeModal(modal) {
        if (!modal) return;
        modal.classList.remove('is-visible');
        modal.setAttribute('aria-hidden', 'true');
        if (!document.querySelector('.modal.is-visible')) {
          document.body.classList.remove('modal-open');
          document.removeEventListener('keydown', handleKeydown);
        }
        if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
          lastFocusedElement.focus();
        }
        if (activeModal === modal) {
          activeModal = null;
        }
      }

      triggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
          event.preventDefault();
          const targetId = trigger.getAttribute('data-modal-target');
          if (!targetId) return;
          const modal = document.getElementById(targetId);
          openModal(modal);
        });
      });

      modals.forEach((modal) => {
        modal.addEventListener('click', (event) => {
          if (event.target === modal) {
            closeModal(modal);
          }
        });

        modal.querySelectorAll('[data-modal-close]').forEach((button) => {
          button.addEventListener('click', () => closeModal(modal));
        });
      });
    });
  </script>

  <!-- Fin de page -->
</body>
</html>
