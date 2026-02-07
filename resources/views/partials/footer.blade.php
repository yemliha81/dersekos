   
  </div>
<div class="footer">
   <footer>
      <div>
        <div style="font-weight:700">DerseKos</div>
        <div class="muted" style="font-size:13px">© "DerseKos" 2025 — Tüm hakları saklıdır.</div>
      </div>

      <div style="display:flex; gap:12px; align-items:center">
        <a href="{{ route('contact') }}" class="">İletişim</a>
      </div>
    </footer>
</div>
<script>
  // Mobile nav toggle
    document.querySelector('.mobile-nav-toggle').addEventListener('click', function() {
      const nav = document.querySelector('.top-nav-bar');
      if (nav.style.display === 'flex') {
        nav.style.display = 'none';
      } else {
        nav.style.display = 'flex';
        nav.style.flexDirection = 'column';
        nav.style.gap = '10px';
      }
    });
</script>
</body>

</html>