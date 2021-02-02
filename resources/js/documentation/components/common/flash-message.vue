<template>
    <div>
        <div class="flash-container">
            <div id="flash-message"
                 :class="type === 'error' ? classes.ERROR : classes.SUCCESS"
                 class="flash-message">
                <p class="flash-message__content"
                   aria-live="off"
                   tabindex="-1">
                    {{message}}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "flash-message",
        data() {
            return {
                isShown: false,

                classes: {
                    FLASH: 'flash-message',
                    ANIMATE_IN: 'flash-message--is-animating-in',
                    ANIMTE_OUT: 'flash-message--is-animating-out',
                    ERROR: 'flash-message--error',
                    SUCCESS: 'flash-message--success'
                }
            }
        },
        mounted() {
            this.showAndHideMessage()
        },
        props: {
            message: String,
            type: String
        },
        methods: {
            showAndHideMessage() {
                let element = document.getElementById(this.classes.FLASH)
                element.classList.add(this.classes.ANIMATE_IN)

                setTimeout(() => {
                    element.classList.remove(this.classes.ANIMATE_IN)
                    element.classList.add(this.classes.ANIMTE_OUT)

                    element.addEventListener('animationend', () => {
                        element.remove()
                    })
                }, 3000)
            },
        }
    }
</script>

<style lang="scss" scoped>
    $inward-easing: cubic-bezier(0.175, 0.885, 0.32, 1.275);
    $outward-easing: cubic-bezier(0.77, 0, 0.175, 1);

    .flash-container {
        align-items: center;
        left: 0;
        bottom: 2rem;
        display: flex;
        justify-content: flex-end;
        position: fixed;
        width: 100%;
        pointer-events: none;
        z-index: 1000000000000;
        padding: 0.75rem;
    }

    .flash-message {
        background: rgba(0, 0, 0, 0.88);
        border-radius: 3px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        color: #FFF;
        cursor: default;
        display: flex;
        max-width: 400px;
        pointer-events: auto;
        position: relative;
        font-weight: 400;
        line-height: 1.25;
        + .flash-message {
            margin-bottom: .75rem;
        }
    }

    .flash-message--error {
        background: rgba(216, 62, 62, 0.88);
    }

    .flash-message--success {
        background: rgba(81, 216, 1, 0.88);
    }

    .flash-message__content {
        margin: 0;
        padding: 1rem 2rem;
    }

    .flash-message--is-animating-in {
        animation-duration: 0.333333s;
        animation-name: flashAnimateIn;
        animation-timing-function: $inward-easing;
    }

    .flash-message--is-animating-out {
        animation-duration: 0.333333s;
        animation-name: flashAnimateOut;
        animation-timing-function: $outward-easing;
    }

    //Animation
    @keyframes flashAnimateIn {
        0% {
            opacity: 0;
            transform: translateX(250px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes flashAnimateOut {
        0% {
            opacity: 1;
            transform: translateX(0);
        }

        100% {
            opacity: 0;
            transform: translateX(250px);
        }
    }
</style>
