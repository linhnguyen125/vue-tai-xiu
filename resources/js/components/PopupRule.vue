<template>
    <div class="wrapper-popup" v-bind:class="getClassPopup">
        <div class="rule">
            <h3>Luật chơi</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum,
                dicta dignissimos et expedita fugit harum incidunt ipsam magni
                maxime molestiae neque nihil officia possimus quaerat quidem
                sunt unde vel voluptatem? Aliquam beatae deleniti dolores est
                quidem! Blanditiis, dicta dolorem facilis harum inventore non
                obcaecati provident quos soluta tempora totam veritatis?
            </p>
            <button class="confirm" v-on:click="confirm">Đã hiểu</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "rule",
    props: {
        isOpenPopup: Boolean
    },
    data() {
        return {};
    },
    computed: {
        getClassPopup: function() {
            return {
                "open-popup": this.isOpenPopup
            };
        }
    },
    methods: {
        confirm: function(){
            this.$emit('confirm')
        }
    }
};
</script>

<style>
.wrapper-popup {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.4);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}
.wrapper-popup.open-popup {
    opacity: 1;
    visibility: visible;
}
.rule {
    width: 500px;
    padding: 20px;
    position: absolute;
    background-color: #fff;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1.2);
    transition: all 0.3s ease;
    font-family: Arial;
}
.open-popup .rule {
    transform: translate(-50%, -50%) scale(1);
}
.rule h3 {
    margin-top: 10px;
    margin-bottom: 20px;
}
.confirm {
    border: 1px solid #333;
    padding: 8px 15px;
    background-color: #fff;
    margin-top: 20px;
    transition: all 0.3s ease;
}

.confirm:hover {
    background-color: #333;
    color: #fff;
}
</style>
