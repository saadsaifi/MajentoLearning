<?php
namespace MyCompany\RegistrationModule\Controller\Adminhtml\Admin1;

use Magento\Backend\App\Action;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Filesystem;
use Magento\Framework\Exception\LocalizedException;

class UploadImage extends Action
{
protected $uploaderFactory;
protected $filesystem;
protected $directoryList;

public function __construct(
Action\Context $context,
UploaderFactory $uploaderFactory,
Filesystem $filesystem,
\Magento\Framework\App\Filesystem\DirectoryList $directoryList
) {
parent::__construct($context);
$this->uploaderFactory = $uploaderFactory;
$this->filesystem = $filesystem;
$this->directoryList = $directoryList;
}

public function execute()
{
try {
$uploader = $this->uploaderFactory->create(['fileId' => 'image']);
$uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
$uploader->setAllowRenameFiles(true);
$uploader->setFilesDispersion(true);

$mediaDirectory = $this->filesystem->getDirectoryWrite($this->directoryList::MEDIA);
$result = $uploader->save($mediaDirectory->getAbsolutePath('employee_images'));

if (!$result) {
throw new LocalizedException(__('Image upload failed.'));
}

$imagePath = 'employee_images' . $result['file'];
return $this->getResponse()->setBody(json_encode([
'error' => false,
'file' => $imagePath,
'url' => $this->_url->getBaseUrl(['_type' => \Magento\Framework\UrlInterface::URL_TYPE_MEDIA]) . $imagePath
]));
} catch (\Exception $e) {
return $this->getResponse()->setBody(json_encode([
'error' => true,
'message' => $e->getMessage()
]));
}
}
}
