<template>
    <div>
        <div class="results-container mt-3 mb-3">
            <div @click="viewType = 'rating'" class="results-item" :class="viewType === 'rating' ? 'results-item_active' : ''">
                <div class="d-flex align-items-center">
                    <i class="far fa-star results-icon"></i>
                    <span>Рейтинг</span>
                </div>
            </div>
            <div @click="viewType = 'motivation'" class="results-item" :class="viewType === 'motivation' ? 'results-item_active' : ''">
                <div class="d-flex align-items-center">
                    <i class="far fa-grin-stars results-icon"></i>
                    <span>Мотивация</span>
                </div>
            </div>
            <div @click="viewType = 'report'" class="results-item" :class="viewType === 'report' ? 'results-item_active' : ''">
                <div class="d-flex align-items-center">
                    <i class="fas fa-chart-pie results-icon"></i>
                    <span>Отчет</span>
                </div>
            </div>
        </div>
        <div>
            <rating v-if="viewType === 'rating'" :propsUserISN="propsUserISN"></rating>
            <motivation v-if="viewType === 'motivation'" :propsUserISN="propsUserISN"></motivation>
            <report v-if="viewType === 'report'" :propsUserISN="propsUserISN"></report>
        </div>
    </div>
</template>

<script>
    export default {
        name: "my-results",
        data() {
            return {
                viewType: 'rating'
            }
        },
        props: {
            propsUserISN: Number,
        }
    }
</script>

<style scoped>
    .results-container {
        background-color: #FFF;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .results-item {
        cursor: pointer;
        color: #333;
        padding: 1rem 1.4rem;
        transition: 0.4s ease all;
        border: 1px solid transparent;
        display: flex;
        width: 100%;
        justify-content: center;
    }
    .results-item:first-child {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }
    .results-item:last-child {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }
    .results-item:hover {
        border: 1px solid cornflowerblue;
        color: cornflowerblue;
    }
    .results-item:hover .fa-star {
        transition: 0.4s ease;
        color: #FFCA3D;
        text-shadow: 0 0 8px rgba(255, 205, 40, 0.5);
    }
    .results-item:hover .fa-grin-stars {
        transition: 0.4s ease;
        color: #99d900;
        text-shadow: 0 0 8px rgba(128, 235, 0, 0.5);
    }
    .results-item:hover .fa-chart-pie {
        transition: 0.4s ease;
        color: #ff9322;
        text-shadow: 0 0 8px rgba(255, 145, 62, 0.5);
    }
    .results-item_active {
        color: #FFF;
        pointer-events: none;
        background-color: cornflowerblue;
        box-shadow: 0 0 20px rgba(47, 100, 187, 0.3);
    }
    .results-icon {
        font-size: 1.3rem;
        margin-right: 0.5rem;
    }
</style>
