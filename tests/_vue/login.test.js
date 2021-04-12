import {shallowMount, createLocalVue} from "@vue/test-utils";
import Login from '../../resources/js/components/registration/login.vue';
import FlashMessage from '@smartweb/vue-flash-message'

describe('login.vue', () => {
    let localVue;

    beforeEach(() => {
        localVue = createLocalVue();
        localVue.use(FlashMessage);
    })

    it('should be correct values', () => {
        const wrapper = shallowMount(Login, {
            localVue,
            data() {
                return {
                    username : 'Username',
                    password : '',
                };
            }
        });

        expect(wrapper.find('#username').element.value).toBe('Username');
        expect(wrapper.find('#username').attributes().placeholder).toBe('Логин');
    });
});
