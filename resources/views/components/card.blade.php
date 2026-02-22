@props(['title', 'image', 'description'])

<div class="genz-card" style="
    background: rgba(255,255,255,0.82);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(59,130,246,0.12);
    border-radius: 1.4rem;
    overflow: hidden;
    transition: all 0.35s cubic-bezier(0.34,1.2,0.64,1);
    display: flex;
    flex-direction: column;
    position: relative;
" onmouseover="this.style.transform='translateY(-7px)';this.style.boxShadow='0 24px 48px rgba(59,130,246,0.14)';this.style.borderColor='rgba(59,130,246,0.28)'" onmouseout="this.style.transform='';this.style.boxShadow='';this.style.borderColor='rgba(59,130,246,0.12)'">

    @if(isset($image))
    <div style="overflow:hidden;position:relative;flex-shrink:0;">
        <img
            src="{{ $image }}"
            alt="{{ $title ?? 'Card image' }}"
            style="width:100%;height:200px;object-fit:cover;display:block;transition:transform 0.55s ease;"
            onmouseover="this.style.transform='scale(1.05)'"
            onmouseout="this.style.transform=''"
            loading="lazy"
        >
        <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(15,30,70,0.35) 0%, transparent 55%);pointer-events:none;"></div>
    </div>
    @endif

    <div style="padding:1.4rem;flex:1;display:flex;flex-direction:column;">
        @if(isset($title))
        <h3 style="font-family:'Syne',sans-serif;font-weight:700;font-size:1.05rem;color:#1E3A5F;margin-bottom:0.6rem;line-height:1.35;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
            {{ $title }}
        </h3>
        @endif

        @if(isset($description))
        <p style="font-size:0.84rem;color:#64748B;line-height:1.65;flex:1;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
            {{ $description }}
        </p>
        @endif

        @if($slot->isNotEmpty())
        <div style="margin-top:1rem;padding-top:0.8rem;border-top:1px solid rgba(59,130,246,0.08);">
            {{ $slot }}
        </div>
        @endif
    </div>
</div>