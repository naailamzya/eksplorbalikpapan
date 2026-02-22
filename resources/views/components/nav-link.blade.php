@props(['active' => false])

<a {{ $attributes->merge([
    'style' => ($active ?? false)
        ? 'display:inline-flex;align-items:center;gap:6px;padding:7px 16px;border-radius:100px;font-size:0.84rem;font-weight:500;color:#fff;background:linear-gradient(135deg,rgba(59,130,246,0.48) 0%,rgba(34,211,238,0.28) 100%);border:1px solid rgba(96,165,250,0.48);box-shadow:0 0 16px rgba(59,130,246,0.32),inset 0 0 12px rgba(34,211,238,0.08);text-decoration:none;white-space:nowrap;transition:all 0.25s cubic-bezier(0.34,1.56,0.64,1);font-family:\'DM Sans\',sans-serif;'
        : 'display:inline-flex;align-items:center;gap:6px;padding:7px 16px;border-radius:100px;font-size:0.84rem;font-weight:500;color:rgba(191,219,254,0.72);background:transparent;border:1px solid transparent;text-decoration:none;white-space:nowrap;transition:all 0.25s cubic-bezier(0.34,1.56,0.64,1);font-family:\'DM Sans\',sans-serif;'
]) }}
onmouseover="if(!this.classList.contains('active-nav')){this.style.color='#fff';this.style.background='rgba(59,130,246,0.18)';this.style.borderColor='rgba(96,165,250,0.32)';this.style.transform='translateY(-2px) scale(1.03)';}"
onmouseout="if(!this.classList.contains('active-nav')){this.style.color='rgba(191,219,254,0.72)';this.style.background='transparent';this.style.borderColor='transparent';this.style.transform='';}">
    {{ $slot }}
</a>