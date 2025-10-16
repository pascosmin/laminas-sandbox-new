#!/usr/bin/env bash
# Convenience aliases and functions for the Laminas sandbox
# Source this file in your shell to enable the aliases:
#   source /absolute/path/to/your/workspace/bin/aliases.sh
# or add the line above to your ~/.bashrc or ~/.profile

# Determine the directory containing this file so aliases work from any cwd
_LAMINAS_SANDBOX_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
START_SCRIPT="$ _LAMINAS_SANDBOX_DIR/start-server"
STOP_SCRIPT="$ _LAMINAS_SANDBOX_DIR/stop-server"

# Fallback in case previous expansion introduced a space: normalize
_LAMINAS_SANDBOX_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
START_SCRIPT="$_LAMINAS_SANDBOX_DIR/start-server"
STOP_SCRIPT="$_LAMINAS_SANDBOX_DIR/stop-server"

alias app-start="bash \"$START_SCRIPT\""
alias app-stop="bash \"$STOP_SCRIPT\""

app-server() {
  case "${1:-}" in
    start)
      bash "$START_SCRIPT"
      ;;
    stop)
      bash "$STOP_SCRIPT"
      ;;
    status)
      PIDFILE="data/php-server.pid"
      if [ -f "$PIDFILE" ]; then
        PID=$(cat "$PIDFILE" 2>/dev/null || echo "")
        if [ -n "$PID" ] && kill -0 "$PID" >/dev/null 2>&1; then
          echo "Server running (PID $PID)"
        else
          echo "PID file exists but process not running"
        fi
      else
        echo "Server not running (no PID file)"
      fi
      ;;
    *)
      echo "Usage: app-server start|stop|status"
      return 1
      ;;
  esac
}
