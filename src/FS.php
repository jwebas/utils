<?php declare(strict_types=1);


namespace Jwebas\Utils;


use RuntimeException;

class FS
{
    /**
     * Get basename.
     *
     * @param string $path
     *
     * @return string
     */
    public static function basename(string $path): string
    {
        return pathinfo($path, PATHINFO_BASENAME);
    }

    /**
     * Function to strip additional / or \ in a path name.
     *
     * @param string $path
     * @param string $dirSep
     *
     * @return string
     */
    public static function clean(string $path, string $dirSep = DIRECTORY_SEPARATOR): string
    {
        if (!is_string($path) || empty($path)) {
            return '';
        }

        $path = trim($path);

        if (($dirSep === '\\') && ($path[0] === '\\') && ($path[1] === '\\')) {
            $path = "\\" . preg_replace('#[/\\\\]+#', $dirSep, $path);
        } else {
            $path = preg_replace('#[/\\\\]+#', $dirSep, $path);
        }

        return $path;
    }

    /**
     * Get dirname.
     *
     * @param string $path
     *
     * @return string
     */
    public static function dirName(string $path): string
    {
        return pathinfo($path, PATHINFO_DIRNAME);
    }

    /**
     * Checks whether a file or directory exists.
     *
     * @param string $path
     *
     * @return bool
     */
    public static function exists(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * Get file extension.
     *
     * @param string $path
     *
     * @return string
     */
    public static function extension(string $path): string
    {
        if (strpos($path, '?') !== false) {
            $path = preg_replace('#\?(.*)#', '', $path);
        }

        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        return $ext;
    }

    /**
     * Get filename.
     *
     * @param string $path
     *
     * @return string
     */
    public static function filename(string $path): string
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    /**
     * Check is current path is directory.
     *
     * @param string $path
     *
     * @return bool
     */
    public static function isDir(string $path): bool
    {
        return is_dir($path);
    }

    /**
     * Check is current path is regular file
     *
     * @param string $path
     *
     * @return bool
     */
    public static function isFile(string $path): bool
    {
        return is_file($path);
    }

    /**
     * Get realpath.
     *
     * @param string $path
     *
     * @return string
     */
    public static function realpath(string $path): string
    {
        return realpath($path);
    }

    /**
     * Removes a directory (and its contents) recursively.
     *
     * @param string $dir              The directory to be deleted recursively
     * @param bool   $traverseSymlinks Delete contents of symlinks recursively
     *
     * @return bool
     */
    public static function rmDir(string $dir, bool $traverseSymlinks = false): bool
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            throw new RuntimeException('Given path is not a directory');
        }

        if ($traverseSymlinks || !is_link($dir)) {
            foreach (scandir($dir, SCANDIR_SORT_NONE) as $file) {
                if ($file === '.' || $file === '..') {
                    continue;
                }

                $currentPath = $dir . '/' . $file;

                if (is_dir($currentPath)) {
                    static::rmDir($currentPath, $traverseSymlinks);
                } elseif (!unlink($currentPath)) {
                    throw new RuntimeException('Unable to delete ' . $currentPath);
                }
            }
        }

        // Windows treats removing directory symlinks identically to removing directories.
        if (!defined('PHP_WINDOWS_VERSION_MAJOR') && is_link($dir)) {
            if (!unlink($dir)) {
                throw new RuntimeException('Unable to delete ' . $dir);
            }
        } else if (!rmdir($dir)) {
            throw new RuntimeException('Unable to delete ' . $dir);
        }

        return true;
    }

    /**
     * Strip off the extension if it exists.
     *
     * @param string $path
     *
     * @return string
     */
    public static function stripExtension(string $path): string
    {
        $reg = '/\.' . preg_quote(static::extension($path)) . '$/';
        $path = preg_replace($reg, '', $path);

        return $path;
    }
}
