<div id="survey-dialog" class="survey-dialog">
  <div class="survey-content">
    <i id="survey-close-btn" data-lucide="x" class="survey-close-btn"></i>
    <h3 class="text-lg font-medium text-slate-800 text-center">Survey Kepuasan Layanan</h3>
    <p class="text-sm text-slate-600 text-center mb-4">Seberapa puas Anda dengan layanan kami?</p>
    
    <div class="survey-stars">
      <i data-lucide="star" data-value="1"></i>
      <i data-lucide="star" data-value="2"></i>
      <i data-lucide="star" data-value="3"></i>
      <i data-lucide="star" data-value="4"></i>
      <i data-lucide="star" data-value="5"></i>
    </div>
    
    <textarea
      placeholder="Berikan masukan Anda..."
      class="w-full p-2 border rounded-md min-h-24 text-sm text-slate-700 border-slate-300"
    ></textarea>
    
    <button class="w-full mt-4 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium h-10 px-4 py-2 bg-[#003d82] text-white hover:bg-[#002754]">
      Kirim Penilaian
    </button>
  </div>
</div>

@push('scripts')
<script>
  // Script Survey Modal
  const surveyDialog = document.getElementById('survey-dialog');
  const surveyBtnFooter = document.getElementById('survey-btn-footer');
  const surveyBtn = document.getElementById('survey-btn'); // Dari antrian.blade.php
  const surveyCloseBtn = document.getElementById('survey-close-btn');

  function openSurvey() {
    if(surveyDialog) surveyDialog.style.display = 'flex';
  }
  function closeSurvey() {
    if(surveyDialog) surveyDialog.style.display = 'none';
  }

  if(surveyBtnFooter) surveyBtnFooter.addEventListener('click', openSurvey);
  if(surveyBtn) surveyBtn.addEventListener('click', openSurvey); // Untuk halaman Antrian
  if(surveyCloseBtn) surveyCloseBtn.addEventListener('click', closeSurvey);
  
  // Survey Stars logic
  const stars = document.querySelectorAll('.survey-stars i');
  stars.forEach(star => {
    star.addEventListener('click', () => {
      const value = parseInt(star.getAttribute('data-value'));
      stars.forEach((s, i) => {
        if (i < value) {
          s.classList.add('selected');
          s.setAttribute('fill', 'currentColor');
        } else {
          s.classList.remove('selected');
          s.removeAttribute('fill');
        }
      });
    });
  });

  // Close dialog on outside click
  window.addEventListener('click', (event) => {
    if (event.target == surveyDialog) {
      closeSurvey();
    }
  });
</script>
@endpush