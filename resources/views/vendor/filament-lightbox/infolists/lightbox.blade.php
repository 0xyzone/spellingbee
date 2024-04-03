<x-filament-lightbox::lightbox-wrapper
    :parentEntryWrapper="$getEntryWrapperView()"
    :href="$getHref()"
    :id="$getId()"
    :extraAttributes="$getExtraAttributes()"
    :gallery="$getSlideGallery()"
    :title="$getSlideTitle()"
    :description="$getSlideDescription()"
    :descPosition="$getSlideDescPosition()"
    :type="$getSlideType()"
    :widthOption="$getSlideWidth()"
    :heightOption="$getSlideHeight()"
    :zoomable="$getSlideZoomable()"
    :draggable="$getSlideDraggable()"
    :sizes="$getSlideSizes()"
    :srtSet="$getSlideSrtSet()"
    :slideEffect="$getSlideEffect()"
>
    {{ $getChildComponentContainer() }}
</x-filament-lightbox::lightbox-wrapper>
