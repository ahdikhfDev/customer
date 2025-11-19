@php
  $isAntrian = Request::is('antrian'); // Contoh kondisi untuk style print
@endphp
<style>
  :root {
    --font-size: 16px;
    --background: #ffffff;
    --foreground: oklch(0.145 0 0);
    --card: #ffffff;
    --card-foreground: oklch(0.145 0 0);
    --popover: oklch(1 0 0);
    --popover-foreground: oklch(0.145 0 0);
    --primary: #030213;
    --primary-foreground: oklch(1 0 0);
    --secondary: oklch(0.95 0.0058 264.53);
    --secondary-foreground: #030213;
    --muted: #ececf0;
    --muted-foreground: #717182;
    --accent: #e9ebef;
    --accent-foreground: #030213;
    --destructive: #d4183d;
    --destructive-foreground: #ffffff;
    --border: rgba(0, 0, 0, 0.1);
    --input: #f3f3f5;
    --input-background: #f3f3f5;
    --switch-background: #cbced4;
    --font-weight-medium: 500;
    --font-weight-normal: 400;
    --ring: oklch(0.708 0 0);
    --radius: 0.625rem;
  }
  
  html {
    font-size: var(--font-size);
    scroll-behavior: smooth;
  }
  
  body {
    font-family: 'Inter', sans-serif;
    background-color: var(--background);
    color: var(--foreground);
  }

  /* Style untuk Survey Dialog */
  .survey-dialog {
    display: none; 
    position: fixed;
    z-index: 100;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
  }
  .survey-content {
    background-color: #fff;
    margin: auto;
    padding: 24px;
    border-radius: 0.75rem;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    position: relative;
  }
  .survey-close-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    cursor: pointer;
    color: #9ca3af;
  }
  .survey-stars {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin: 20px 0;
  }
  .survey-stars i {
    width: 36px;
    height: 36px;
    color: #e0e0e0;
    cursor: pointer;
    transition: color 0.2s;
  }
  .survey-stars i:hover,
  .survey-stars i.selected {
    color: #f59e0b;
  }

  {{-- Hanya tambahkan style print jika di halaman antrian --}}
  @if($isAntrian)
  @media print {
    body > *:not(.print-area) {
      display: none;
    }
    .print-area, .print-area .print-content {
      display: block;
      margin: 0;
      padding: 0;
      width: 100%;
      max-width: 100%;
      box-shadow: none;
      border: none;
    }
    .print-area .no-print {
      display: none;
    }
  }
  @endif

  /* Style untuk form (dari form.html) */
  .form-label {
    display: block;
    margin-bottom: 0.25rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
  }
  .form-label .required-star {
    color: var(--destructive);
  }
  
  .form-input, .form-textarea {
    display: block;
    width: 100%;
    border-radius: 0.5rem;
    border: 1px solid var(--border);
    background-color: var(--input-background);
    padding: 0.625rem 0.75rem;
    font-size: 0.875rem;
    color: var(--foreground);
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  
  .form-input:focus, .form-textarea:focus {
    outline: none;
    border-color: #003d82;
    box-shadow: 0 0 0 2px rgba(0, 61, 130, 0.2);
  }
  
  .file-upload-area {
    border: 2px dashed var(--border);
    border-radius: 0.75rem;
    padding: 1.5rem;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.2s, border-color 0.2s;
  }
  
  .file-upload-area:hover {
    background-color: #f9fafb;
    border-color: #003d82;
  }

  .file-upload-area i {
    width: 2rem;
    height: 2rem;
    color: #9ca3af;
    margin-bottom: 0.5rem;
  }
  
  .hidden-file-input {
    display: none;
  }

  .file-name-preview {
    display: block;
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #16a34a;
    font-weight: 500;
    text-align: center;
  }

</style>