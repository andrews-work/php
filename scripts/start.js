require('dotenv').config({ path: `config/env/.env.${process.env.NODE_ENV}` });

const { exec } = require('child_process');

const commands = [
  'npm run build:css',
  'npm run start:php',
  'npm run start:browser-sync'
];

commands.forEach(command => {
  exec(command, (error, stdout, stderr) => {
    if (error) {
      console.error(`Error executing ${command}: ${error.message}`);
      return;
    }
    if (stderr) {
      console.error(`Stderr from ${command}: ${stderr}`);
      return;
    }
    console.log(`Stdout from ${command}: ${stdout}`);
  });
});
