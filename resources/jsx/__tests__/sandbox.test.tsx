import '../__mocks__/match-media';
import {Sandbox} from '../sandbox';
import React from 'react';
import TestRenderer from 'react-test-renderer';

describe('sandbox tests', () => {
    it('sandbox', () => {
        const testRenderer = TestRenderer.create(<Sandbox />);
        const testInstance = testRenderer.root;

        expect(testInstance.children.length).toEqual(1);
        expect((testInstance.children[0] as any).children).not.toBeNull();
    });
});
