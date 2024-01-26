<div>
    <div x-ref="paneladmin12345678" class="p-3 position-fixed w-100 bg-blue top-0 left-0" style="z-index: 1100">
        Test
    </div>
    <div x-data="{
        test() {
            this.$el.style.height = (this.$refs.paneladmin12345678.clientHeight) + 'px';
        }
    }" x-init="test">
    </div>
</div>
