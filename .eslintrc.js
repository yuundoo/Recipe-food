import { someConfigOption } from './path-to-config.js';

module.exports = {
   // 다른 설정...

   // Prettier 플러그인을 사용하도록 설정
   plugins: ['prettier'],

   // Prettier 규칙을 확장
   extends: ['plugin:prettier/recommended'],

   // 프로젝트에 맞게 규칙을 조정하거나 추가
   rules: {
      // 다른 규칙...
      'prettier/prettier': 'error',
   },
};
