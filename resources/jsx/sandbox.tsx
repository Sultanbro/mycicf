import React from 'react';

export function Sandbox({a, b}: any) {
    return <div>
        <p>{a}</p>
        <p>{b}</p>
    </div>
}

export function sum(a: number, b: number) {
    return a + b;
}
