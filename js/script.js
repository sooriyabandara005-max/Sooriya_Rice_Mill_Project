document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener("click", e => {
      const target = document.querySelector(link.getAttribute("href"));
      if (target) { e.preventDefault(); target.scrollIntoView({behavior:"smooth"}); }
    });
  });
  document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", e => {
      const required = [...form.querySelectorAll("[required]")];
      const invalid = required.find(input => !input.value.trim());
      if (invalid) { e.preventDefault(); invalid.focus(); alert("Please complete all required fields."); }
    });
  });
});