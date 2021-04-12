import {shallowMount} from "@vue/test-utils";
import Sandbox from '../../resources/js/components/sandbox.vue';

describe('Sandbox.vue', () => {
    it('should be the correct color', () => {
        const wrapper = shallowMount(Sandbox, {
            data() {
                return { a: 2 };
            }
        });
        expect(wrapper.text()).toMatch('Sandbox 2');
        const wrapper2 = shallowMount(Sandbox, {
            data() {
                return { a: 6 };
            }
        });
        expect(wrapper2.text()).toMatch('Sandbox 6');
    });
});
