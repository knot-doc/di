<?php
declare(strict_types=1);

namespace KnotDoc\Di\FileSystem;

use KnotLib\Kernel\FileSystem\Dir as KernelDir;

final class Dir
{
    const TEMPLATE           = KernelDir::TEMPLATE;
    const CONFIG             = KernelDir::CONFIG;

    const DOCUMENT           = KernelDir::USER_DIR_BASE + 1;
    const I18N               = KernelDir::USER_DIR_BASE + 2;
}