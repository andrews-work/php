require('dotenv').config({ path: `app/core/config/env/.env.${process.env.NODE_ENV}` });

const { spawn } = require('child_process');

const commands = {
  dev: [
    {
      command: 'tailwindcss -i ./src/presentation/css/input.css -o ./public/css/output.css --watch',
      message: 'building tailwind'
    },
    {
      command: `php -S localhost:${process.env.PORT} -t public`,
      message: 'server on port: ' + process.env.PORT
    },
    {
      command: 'browser-sync start --config bs-config.js',
      message: 'browser sync ports'
    }
  ],
  uat: [
    // Add UAT-specific commands here
  ],
  prod: [
    // Add production-specific commands here
  ]
};

const env = process.env.NODE_ENV;

if (commands[env]) {
  commands[env].forEach(cmd => {
    console.log(`${cmd.message}...`);
    const [command, ...args] = cmd.command.split(' ');
    const process = spawn(command, args);

    process.stdout.on('data', (data) => {
      console.log(`${data.toString().trim()}`);
    });

    process.stderr.on('data', (data) => {
      console.error(`${data.toString().trim()}`);
    });

    process.on('close', (code) => {
      console.log(`${cmd.message} completed with code ${code}`);
    });

    process.on('error', (err) => {
      console.error(`Error executing ${cmd.command}: ${err.message}`);
    });
  });
} else {
  console.error(`Unknown environment: ${env}`);
}
